/**
 * 从优化后的 URL 中提取文件信息
 */
export function extractFileInfo(url: string): { baseName: string; targetFormat: string } {
    const match = url.match(/images%2F([^%]+)\.(png|jpe?g|gif|webp)/i);
    if (match) {
        const format = match[2].toLowerCase();
        // 统一 jpeg/jpg 的处理
        const targetFormat = format === 'jpeg' ? 'jpg' : format;
        return {
            baseName: match[1],
            targetFormat
        };
    }
    return {
        baseName: 'image',
        targetFormat: 'png' // 默认格式
    };
}

/**
 * 将图片转换为指定格式
 */
export async function convertImage(blob: Blob, targetFormat: string): Promise<Blob> {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.onload = () => {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;

            const ctx = canvas.getContext('2d');
            if (!ctx) {
                reject(new Error('Failed to get canvas context'));
                return;
            }
            ctx.drawImage(img, 0, 0);

            // 根据目标格式设置 MIME 类型
            const mimeType = targetFormat === 'jpg' ? 'image/jpeg' : `image/${targetFormat}`;

            canvas.toBlob((convertedBlob) => {
                if (convertedBlob) {
                    resolve(convertedBlob);
                } else {
                    reject(new Error(`Failed to convert to ${targetFormat}`));
                }
            }, mimeType, targetFormat === 'jpg' ? 0.92 : undefined); // JPEG 格式时设置质量
        };
        img.onerror = () => reject(new Error('Failed to load image'));
        img.src = URL.createObjectURL(blob);
    });
} 