/**
 * 代码转换器类
 */
export default class CodeConverter {
    /**
     * 转换 Markdown 代码块的语言标识
     * @param content Markdown 内容
     * @returns 转换后的内容
     */
    public static convert(content: string): string {
        // 将 vue 和 astro 代码块转换为 js 代码块
        return content
            .replace(/```vue/g, '```js')
            .replace(/```astro/g, '```js');
    }
} 