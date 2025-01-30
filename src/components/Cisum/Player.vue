<template>
    <div class="bg-gradient-to-br from-emerald-500/80 to-sky-600/80 rounded-lg p-4 w-[400px] shadow-lg">
        <div class="flex gap-2 mb-4">
            <span class="w-3 h-3 rounded-full bg-red-400"></span>
            <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
            <span class="w-3 h-3 rounded-full bg-green-400"></span>
        </div>

        <div class="text-gray-800">
            <div class="text-center">{{ songs[0] }}</div>

            <div class="player-controls">
                <div class="flex justify-center gap-8 my-4">
                    <Button size="w-16" :lang="lang" :showTips="true">
                        <RiSkipBackLine class="w-8 h-8" />
                    </Button>
                    <Button size="w-16" :lang="lang" :showTips="true">
                        <RiPlayCircleLine class="w-8 h-8" />
                    </Button>
                    <Button size="w-16" :lang="lang" :showTips="true">
                        <RiSkipForwardLine class="w-8 h-8" />
                    </Button>
                    <Button size="w-16" :lang="lang" :showTips="true">
                        <RiShuffleLine class="w-8 h-8" />
                    </Button>
                </div>

                <div class="flex items-center gap-4 my-4">
                    <span class="time-current">00:00</span>
                    <div class="flex-1 h-1 bg-gray-200 rounded relative">
                        <div class="w-3 h-3 bg-[#8fd3f4] rounded-full absolute top-1/2 -translate-y-1/2">
                        </div>
                    </div>
                    <span class="time-total">03:07</span>
                </div>
            </div>

            <div class="mt-4">
                <div v-for="(song, index) in songs" :key="index"
                    class="flex items-center gap-2 p-2 border-b border-gray-200/40">
                    <RiMusic2Fill class="w-4 h-4" />
                    <span class="song-info">{{ song }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { RiShuffleLine } from '@remixicon/vue';
import { RiPlayCircleLine } from '@remixicon/vue';
import { computed } from 'vue';
import { RiMusic2Fill, RiSkipBackLine, RiSkipForwardLine } from '@remixicon/vue';
import { shuffle } from 'lodash-es';
import Button from '../../../.vitepress/themes/coffic2/components/FeatureButton.vue'

const props = defineProps({
    lang: {
        type: String,
        default: 'en',
        validator: (value) => ['en', 'zh'].includes(value)
    }
})

const allSongs = {
    en: [
        'The Beatles - Hey Jude',
        'Queen - Bohemian Rhapsody',
        'Michael Jackson - Billie Jean',
        'Ed Sheeran - Perfect',
        'Adele - Rolling in the Deep',
        'Taylor Swift - Shake It Off',
        'Pink Floyd - Wish You Were Here',
        'Led Zeppelin - Stairway to Heaven',
        'Coldplay - Fix You',
        'Oasis - Wonderwall',
        'The Rolling Stones - Satisfaction',
        'U2 - With or Without You',
        'Nirvana - Smells Like Teen Spirit',
        'Eagles - Hotel California',
        'David Bowie - Space Oddity',
        'Bob Dylan - Like a Rolling Stone',
        'Elvis Presley - Can\'t Help Falling in Love',
        'The Police - Every Breath You Take',
        'Guns N\' Roses - Sweet Child O\' Mine',
        'John Lennon - Imagine',
        'Whitney Houston - I Will Always Love You',
        'Queen - We Will Rock You',
        'ABBA - Dancing Queen',
        'Elton John - Your Song'
    ],
    zh: [
        '陈奕迅 & 王菲-因为爱情',
        '陈奕迅-好久不见',
        '陈奕迅-十年',
        '陈奕迅-是但求其爱',
        '陈奕迅-淘汰 (国)',
        '陈奕迅-K歌之王',
        '周杰伦-稻香',
        '张学友-吻别',
        '王菲-传奇',
        '邓丽君-月亮代表我的心',
        'beyond-海阔天空',
        '李健-贝加尔湖畔',
        '张国荣-倩女幽魂',
        '梅艳芳-女人花',
        '刘德华-忘情水',
        '周华健-朋友',
        '林忆莲-至少还有你',
        '张惠妹-听海',
        '孙燕姿-遇见',
        '五月天-倔强',
        '莫文蔚-阴天',
        '李宗盛-山丘',
        '张震岳-爱我别走',
        '蔡琴-被遗忘的时光'
    ]
}

const songs = computed(() => {
    const songList = allSongs[props.lang];
    return shuffle(songList).slice(0, 6);
});

</script>
