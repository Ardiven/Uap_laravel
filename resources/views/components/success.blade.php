<div class="bg-green-500 py-2 px-4 rounded-md text-white text-center fixed bottom-4 right-4 flex gap-4 z-50">
    <p>{{ $slot }}</p>
    <span class="cursor-pointer pt-2" onclick="return this.parentNode.remove()"><sup>X</sup></span>
</div>