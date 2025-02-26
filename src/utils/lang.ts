const normalizeLang = (lang: string) => {
    if (lang === 'zh-CN') {
        return 'zh-cn';
    }
    return lang;
}

export { normalizeLang };
