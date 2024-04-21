<div>
    <div class="flex space-x-2 mt-2 container-fluid">
        <button @click="tab = 'about'" :class="{ 'bg-blue-700': tab === 'about' }" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base">About</button>
        <button @click="tab = 'posts'" :class="{ 'bg-blue-700': tab === 'posts' }" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base">Blogs</button>
        <button @click="tab = 'workHistory'" :class="{ 'bg-blue-700': tab === 'workHistory' }" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base">WorkHistory</button>
        <button @click="tab = 'projects'" :class="{ 'bg-blue-700': tab === 'projects' }" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base">Projects</button>
        <button @click="tab = 'socials'" :class="{ 'bg-blue-700': tab === 'socials' }" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base">Socials</button>
        <button @click="tab = 'skills'" :class="{ 'bg-blue-700': tab === 'skills' }" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base">Skills</button>
        <a :href="getAddRoute()" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded text-xs sm:text-base focus:outline-none focus:shadow-outline">Add</a>
    </div>
</div>