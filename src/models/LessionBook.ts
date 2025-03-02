import type { LessionEntry } from "@/database/LessionDB";
import LessionDoc from "./LessionDoc";

export default class LessionBook extends LessionDoc {
    constructor(entry: LessionEntry) {
        super(entry);
    }

    static async all(): Promise<LessionBook[]> {
        return (await LessionDoc.allByDepth(2)) as LessionBook[];
    }

    static async allByLang(lang: string): Promise<LessionBook[]> {
        return (await LessionDoc.allByDepthAndLang(2, lang)) as LessionBook[];
    }
}