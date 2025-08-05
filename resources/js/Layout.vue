<template>
    <main>
        <header class="bg-base-100 shadow-sm">
            <div class="navbar max-w-7xl mx-auto">
                <div class="navbar-start">
                    <a href="/" class="btn btn-ghost text-xl font-bold">📖bookMNGR</a>
                </div>

                <div class="navbar-center">
                    <Nav />
                </div>

                <div class="navbar-end">
                    <button class="btn btn-primary rounded-full px-6">Add A book</button>
                </div>
            </div>
        </header>

        <article class="max-w-7xl mx-auto w-full py-10 px-6">
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
