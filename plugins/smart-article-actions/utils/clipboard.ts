/**
 * 将文本复制到剪贴板
 * @param text 要复制的文本
 * @returns 是否复制成功
 */
export const copyToClipboard = async (text: string): Promise<boolean> => {
    try {
        // 首先尝试使用 navigator.clipboard API
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(text);
            return true;
        }
    } catch (err) {
        console.log('Clipboard API failed, falling back to execCommand', err);
    }

    // 回退到 execCommand 方法
    try {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        // 防止滚动
        textArea.style.cssText = 'position:fixed;top:0;left:0;opacity:0;';
        document.body.appendChild(textArea);
        textArea.select();
        const successful = document.execCommand('copy');
        document.body.removeChild(textArea);
        return successful;
    } catch (err) {
        console.error('execCommand failed', err);
        return false;
    }
}; 