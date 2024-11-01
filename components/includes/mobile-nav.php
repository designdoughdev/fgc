<nav class="mobile-nav " x-show="isOpen" @click.away="isOpen = false"
    x-transition:enter="transition ease-out duration-300 -mr-96" x-transition:enter-start=""
    x-transition:enter-end="transform -translate-x-96" x-transition:leave="transition ease-out duration-300"
    x-transition:leave-start="" x-transition:leave-end="transform translate-x-96">
    <div class="">
        <button class="close-btn" @click="isOpen = false">&times;</button>
        <ul>
            <li>Page</li>
            <li>Page</li>
            <li>Page</li>
            <li>Page</li>
            <li>Page</li>
        </ul>
    </div>

</nav>