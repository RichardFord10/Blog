<div>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Hello, {{ explode(' ', Auth::user()->name)[0] }}! 👋
    </h2>
</div>