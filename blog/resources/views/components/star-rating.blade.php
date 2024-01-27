@php
    $filledStars = round($rating);
    $emptyStars = 5 - $filledStars;
@endphp

<div class="star-rating">
    @for ($i = 0; $i < $filledStars; $i++)
        <span>&#9733;</span> <!-- Filled star -->
    @endfor
    @for ($i = 0; $i < $emptyStars; $i++)
        <span>&#9734;</span> <!-- Empty star -->
    @endfor
</div>
