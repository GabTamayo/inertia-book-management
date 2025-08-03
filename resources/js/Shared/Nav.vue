<template>
    <nav>
        <ul class="menu menu-horizontal space-x-2">
            <li>
                <Link href="/">Dashboard</Link>
            </li>

            <li>
                <Link href="/books">Books</Link>
            </li>

            <li>
                <details>
                    <summary>Settings</summary>
                    <ul class="bg-base-100 rounded-t-none">
                        <li>
                            <Link href="#">Link 1</Link>
                        </li>

                        <li>
                            <label class="flex items-center justify-between w-full gap-3">
                                <span class="text-sm">Theme</span>
                                <input type="checkbox" value="dark" class="toggle theme-controller" />
                            </label>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </nav>
</template>

<script>

</script>
