<template>
    <div>
        <ul class="menu menu-horizontal md:space-x-4">
            <li>
                <Link href="/" :class="{ 'menu-active': $page.url === '/' }">Dashboard</Link>
            </li>

            <li>
                <Link href="/books" :class="{ 'menu-active': $page.url.startsWith('/books') }">Books</Link>
            </li>

            <li>
                <details>
                    <summary>Settings</summary>
                    <ul class="bg-base-100 rounded-t-none z-1">
                        <li>
                            <label class="flex items-center justify-between w-full gap-3">
                                <span class="text-sm">Theme</span>

                                <label class="toggle text-base-content">
                                    <input type="checkbox" value="synthwave" class="theme-controller" />

                                    <v-icon name="hi-sun" />
                                    <v-icon name="hi-moon" />
                                </label>
                            </label>
                        </li>

                        <li>
                            <Link href="#">Logout</Link>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</template>

<script>

</script>
