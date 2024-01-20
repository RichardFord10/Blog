<x-app-layout>
    <div class="container mx-auto py-6">
        <div class="max-w-xl mx-auto">
            <div class="flex justify-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Chat with ChatGPT</h2>
            </div>
            <div x-data="chat()" class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden mb-4 p-4">
                <div id="chat-container" class="mb-4 h-96 overflow-y-auto bg-gray-100 p-4 rounded">
                    <!-- Messages will be displayed here -->
                    <template x-for="(message, index) in messages" :key="index">
                        <div x-text="message.text" class="p-2 my-2 rounded text-gray-800"
                            :class="message.type === 'sent' ? 'bg-blue-200' : 'bg-gray-200'"></div>
                    </template>

                </div>
                <form @submit.prevent="sendMessage">
                    @csrf
                    <div class="mb-4">
                        <input type="text" x-model="message" placeholder="Type your message here..."
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-800 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>