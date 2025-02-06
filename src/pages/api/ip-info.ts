import type { APIRoute } from 'astro';

interface IpInfo {
    query: string;
    country: string;
    city: string;
    isp: string;
    regionName: string;
}

export const GET: APIRoute = async () => {
    try {
        console.log('开始请求 IP 信息...');
        const startTime = Date.now();
        const response = await fetch('http://ip-api.com/json/');
        const endTime = Date.now();

        console.log(`API 响应状态: ${response.status} ${response.statusText}`);
        console.log(`请求耗时: ${endTime - startTime}ms`);

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