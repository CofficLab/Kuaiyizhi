import JSZip from 'jszip';

interface DownloadOptions {
    content: string;
    title: string;
    images: Array<{
        original: string;
        src: string;
    }>;
}

/**
 * 从优化后的 URL 中提取原始文件名
 */
function extractOriginalFileName(url: string): string {
    const match = url.match(/images%2F([^%]+\.png)/);
    return match ? match[1] : 'image.png';
}

/**
 * 下载 Markdown 文件和相关图片
 */
export const downloadMarkdownWithImages = async (options: DownloadOptions): Promise<string> => {
    const { content, title, images } = options;
    const zip = new JSZip();
    let markdown = content;
    const imgPromises = [];

    for (const image of images) {
        const imgName = extractOriginalFileName(image.src);
        const imgPromise = fetch(image.src)
            .then(res => res.blob())
            .then(blob => {
                zip.file(`images/${imgName}`, blob);
                markdown = markdown.replace(image.original, `./images/${imgName}`);
            });
        imgPromises.push(imgPromise);
    }

    await Promise.all(imgPromises);
    zip.file(`${title}.md`, markdown);

    const blob = await zip.generateAsync({ type: 'blob' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${title}.zip`;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
    document.body.removeChild(a);

    return markdown; // 返回处理后的 markdown 内容
}; 