import type { APIRoute } from 'astro';

interface IpInfo {
    query: string;
    country: string;
    city: string;
    isp: string;
    regionName: string;
}

// 禁用预渲染, 因为需要实时获取 IP 信息
export const prerender = false;

export const GET: APIRoute = async () => {
    try {
        const response = await fetch('http://ip-api.com/json/');

        if (!response.ok) {
            return new Response(
                JSON.stringify({ error: '获取 IP 信息失败' }),
                {
                    status: 500,
                    headers: { 'Content-Type': 'application/json' }
                }
            );
        }

        const data: IpInfo = await response.json();
        return new Response(
            JSON.stringify(data),
            {
                status: 200,
                headers: { 'Content-Type': 'application/json' }
            }
        );
    } catch (e) {
        console.error('IP 信息获取失败:', e);
        return new Response(
            JSON.stringify({ error: e instanceof Error ? e.message : '未知错误' }),
            {
                status: 500,
                headers: { 'Content-Type': 'application/json' }
            }
        );
    }
};