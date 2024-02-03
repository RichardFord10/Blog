<section>
    <div class="flex justify-center mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
            @if(isset($work_history) && $work_history->id)
                Edit Work History
            @else
                Add Work History
            @endif
        </h2>
    </div>
</section>