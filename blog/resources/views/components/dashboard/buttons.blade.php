<div>
    <div class="flex space-x-2 mt-2 container-fluid">
        <button @click="tab = 'about'" :class="{ 'bg-blue-700': tab === 'about' }"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">About</button>
        <button @click="tab = 'posts'" :class="{ 'bg-blue-700': tab === 'posts' }"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Blogs</button>
        <button @click="tab = 'workHistory'" :class="{ 'bg-blue-700': tab === 'workHistory' }"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Work
            History</button>
        <button @click="tab = 'projects'" :class="{ 'bg-blue-700': tab === 'projects' }"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Projects</button>
        <button @click="tab = 'socials'" :class="{ 'bg-blue-700': tab === 'socials' }"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Socials</button>
        <a :href="getAddRoute()"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-center">Add</a>
    </div>
</div>