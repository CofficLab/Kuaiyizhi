export const sidebar =
    [
        {
            label: 'Build Your Own Web Toolbox',
            icon: 'laptop',
            items: [
                {
                    label: '目录',
                    autogenerate: { directory: 'build_your_own_web_toolbox' },
                },
            ],
            link: '/build_your_own_web_toolbox',
        },
        {
            label: 'Laravel',
            icon: 'seti:php',
            items: [
                {
                    label: '目录',
                    autogenerate: { directory: 'laravel_learn' },
                },
            ],
            link: '/laravel_learn',
        },
        {
            label: 'Kong',
            icon: 'rocket',
            items: [
                {
                    label: '目录',
                    autogenerate: { directory: 'kong' },
                },
            ],
            link: '/kong',
        },
        {
            label: 'Vue',
            icon: 'seti:vue',
            items: [
                {
                    label: '目录',
                    autogenerate: { directory: 'vue' },
                },
            ],
            link: '/vue',
            topics: ['vue'],
        },
        {
            label: 'Caddy',
            icon: 'seti:code-search',
            items: [
                {
                    label: '目录',
                    autogenerate: { directory: 'caddy' },
                },
            ],
            link: '/caddy',
        },
    ];
