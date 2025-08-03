<template>
    <main>
        <header class="bg-base-100 shadow-sm">
            <div class="navbar max-w-7xl mx-auto px-2">
                <div class="navbar-start">
                    <a class="btn btn-ghost text-xl font-bold">📖bookMNGR</a>
                </div>

                <div class="navbar-center">
                    <Nav />
                </div>

                <div class="navbar-end">
                    <button class="btn btn-primary">Add A book</button>
                </div>
            </div>
        </header>

        <article class="max-w-7xl mx-auto w-full px-6 py-10">
            <slot />
        </article>
    </main>
</template>

<script>
import Nav from './Shared/Nav.vue';

export default {
    components: { Nav }
}
</script>
