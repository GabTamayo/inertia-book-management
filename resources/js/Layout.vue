<template>
    <main class="flex flex-col h-screen">
        <header class="bg-base-100 shadow-sm">
            <div class="navbar max-w-7xl mx-auto">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-2" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <v-icon name="hi-menu" />
                    </label>
                </div>

                <div class="navbar-start">
                    <a href="/" class="btn btn-ghost text-xl font-bold">📖bookMNGR</a>
                </div>


                <div class="navbar-center">
                    <div class="hidden flex-none lg:block">
                        <Nav />
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="hidden flex-none lg:block">
                        <Link href="/books/create" class="btn btn-primary rounded-full px-6">Add A book</Link>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-scroll">
            <article class="max-w-7xl mx-auto w-full py-4 px-6">
                <slot />
            </article>
        </div>
    </main>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import Nav from './Shared/Nav.vue';

export default {
    components: { Nav }
}
</script>
