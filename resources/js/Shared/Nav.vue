<template>
    <div>
        <ul class="menu menu-horizontal md:space-x-4">
            <li>
                <Link href="/" :class="{'menu-active': $page.url === '/'}">Dashboard</Link>
            </li>

            <li>
                <Link href="/books" :class="{'menu-active': $page.url.startsWith('/books')}">Books</Link>
            </li>

            <li>
                <details>
                    <summary>Settings</summary>
                    <ul class="bg-base-100 rounded-t-none z-1">
                        <li>
                            <label class="flex items-center justify-between w-full gap-3">
                                <span class="text-sm">Theme</span>
                                <input type="checkbox" value="dark" class="toggle theme-controller" />
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
