<x-app-layout>
    <div class="container mx-auto py-6">
        <div class="max-w-lg mx-auto">
            <div class="flex justify-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Dino Game</h2>
            </div>
            <div class="dark:bg-gray-700 rounded-lg shadow overflow-hidden p-4 dino-game">
                <div x-data="dinoGame()" x-init="init()">
                    <div id="gameArea" class="bg-gradient-to-t from-cyan-500 to-blue-500">
                        <div x-ref="dino" class="dino"></div>
                        <div x-ref="obstacle" class="obstacle"></div>
                    </div>
                    <button @click="startGame">Start Game</button>
                    <h3>Score: <span x-text="score"></span></h3>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>