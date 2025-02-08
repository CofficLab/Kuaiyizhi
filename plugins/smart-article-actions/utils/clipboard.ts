/**
 * 将文本复制到剪贴板
 * @param text 要复制的文本
 * @returns 是否复制成功
 */
export const copyToClipboard = async (text: string): Promise<boolean> => {
    // 方法1: 尝试使用现代 Clipboard API
    if (navigator.clipboard && window.isSecureContext) {
        try {
            await navigator.clipboard.writeText(text);
            console.log('✅ 复制成功：使用 Clipboard API');
            return true;
        } catch (err) {
            console.log('ℹ️ Clipboard API 失败，尝试其他方法', err);
        }
    }

    // 方法2: 尝试使用 ClipboardItem API
    if ('ClipboardItem' in window && navigator.clipboard?.write) {
        try {
            const type = "text/plain";
            const blob = new Blob([text], { type });
            const data = [new ClipboardItem({ [type]: blob })];
            await navigator.clipboard.write(data);
            console.log('✅ 复制成功：使用 ClipboardItem API');
            return true;
        } catch (err) {
            console.log('ℹ️ ClipboardItem API 失败，尝试其他方法', err);
        }
    }

    // 方法3: 尝试使用 execCommand
    try {
        const textArea = document.createElement('textarea');
        textArea.value = text;

        // 确保文本框在视口内但不影响布局
        textArea.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 2em;
            height: 2em;
            padding: 0;
            border: none;
            outline: none;
            boxShadow: none;
            background: transparent;
        `;

        document.body.appendChild(textArea);

        // 检查是否在 iOS 设备上
        const isIos = navigator.userAgent.match(/ipad|iphone/i);

        if (isIos) {
            // iOS 设备需要特殊处理
            const range = document.createRange();
            range.selectNodeContents(textArea);
            const selection = window.getSelection();
            if (selection) {
                selection.removeAllRanges();
                selection.addRange(range);
            }
            textArea.setSelectionRange(0, 999999);
        } else {
            textArea.select();
        }

        const successful = document.execCommand('copy');
        document.body.removeChild(textArea);

        if (successful) {
            console.log('✅ 复制成功：使用 execCommand 方法');
            return true;
        }
    } catch (err) {
        console.log('ℹ️ execCommand 失败，尝试最后方案', err);
    }

    // 方法4: 如果所有方法都失败，提供可选择的文本框
    try {
        // 创建一个容器
        const container = document.createElement('div');
        container.style.cssText = `
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 600px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 9999;
            padding: 20px;
        `;

        // 添加提示文本
        const hint = document.createElement('div');
        hint.textContent = '如需复制，先尝试复制按钮，如仍无法复制，请手动复制以下文本（Ctrl+C 或 Command+C）';
        hint.style.cssText = `
            margin-bottom: 15px;
            color: #666;
            font-size: 14px;
            text-align: center;
        `;
        container.appendChild(hint);

        // 添加文本框
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.cssText = `
            width: 100%;
            height: 200px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            resize: none;
            margin-bottom: 15px;
        `;
        container.appendChild(textArea);

        // 添加按钮容器
        const buttonContainer = document.createElement('div');
        buttonContainer.style.cssText = `
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        `;

        // 添加复制按钮
        const copyButton = document.createElement('button');
        copyButton.textContent = '复制';
        copyButton.style.cssText = `
            padding: 8px 16px;
            background: #2196f3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        `;
        copyButton.onmouseover = () => copyButton.style.background = '#1976d2';
        copyButton.onmouseout = () => copyButton.style.background = '#2196f3';

        // 添加关闭按钮
        const closeButton = document.createElement('button');
        closeButton.textContent = '关闭';
        closeButton.style.cssText = `
            padding: 8px 16px;
            background: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        `;
        closeButton.onmouseover = () => closeButton.style.background = '#d32f2f';
        closeButton.onmouseout = () => closeButton.style.background = '#f44336';

        buttonContainer.appendChild(copyButton);
        buttonContainer.appendChild(closeButton);
        container.appendChild(buttonContainer);

        // 添加遮罩层
        const overlay = document.createElement('div');
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 9998;
        `;

        // 添加到页面
        document.body.appendChild(overlay);
        document.body.appendChild(container);

        // 自动选中文本
        textArea.focus();
        textArea.select();

        // 绑定事件
        const cleanup = () => {
            document.body.removeChild(container);
            document.body.removeChild(overlay);
        };

        closeButton.onclick = cleanup;
        overlay.onclick = cleanup;
        copyButton.onclick = () => {
            textArea.select();
            const successful = document.execCommand('copy');
            if (successful) {
                console.log('✅ 复制成功：使用弹窗中的复制按钮');
                // 创建成功提示
                hint.textContent = '复制成功！';
                hint.style.color = '#4caf50';
                // 1秒后关闭弹窗
                setTimeout(cleanup, 1000);
            }
        };

        return false;
    } catch (err) {
        console.error('❌ 所有复制方法都失败:', err);
        return false;
    }
}; 