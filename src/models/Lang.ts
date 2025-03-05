export type LangCode = 'zh-cn' | 'en';

export default class Lang {
    code: LangCode;

    constructor(code: LangCode) {
        this.code = code;
    }

    static fromString(lang: string): Lang {
        return new Lang(lang as LangCode);
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
