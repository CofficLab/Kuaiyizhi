<template>
    <div class="w-full h-full p-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">API Testing</h2>
            <p class="text-sm text-gray-500">Test and manage your API endpoints</p>
        </div>

        <div class="flex space-x-4">
            <select class="px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg">
                <option>GET</option>
                <option>POST</option>
                <option>PUT</option>
                <option>DELETE</option>
            </select>
            <input type="text" placeholder="Enter API endpoint"
                class="flex-1 px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg" />
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">Send</button>
        </div>

        <div class="mt-6 p-4 bg-gray-900 text-gray-300 rounded-lg">
            <pre class="text-sm">Response will appear here...</pre>
        </div>
    </div>
</template>