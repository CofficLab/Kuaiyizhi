export default class Lang {
    code: string = '';

    constructor(code: string) {
        this.code = code;
    }

    static fromString(lang: string): Lang {
        return new Lang(lang);
    }

    isChinese(): boolean {
        return this.code === 'zh-cn';
    }

    isEnglish(): boolean {
        return this.code === 'en';
    }

    static isCodeValid(code: string): boolean {
        return code === 'zh-cn' || code === 'en';
    }
}
