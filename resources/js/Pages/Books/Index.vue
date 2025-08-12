<template>
    <div class="flex justify-between space-x-4 space-y-4">
        <!--  Left Bar -->
        <div class="grow place-items-center">
            <div class="drawer lg:drawer-open">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="drawer-side">
                    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                        <li class="menu-title text-2xl">Fiction</li>
                        <template v-for="genre in genres['Fiction']" :key="genre.id">
                            <li><button @click.prevent="selectGenre(genre.genre)">{{ genre.genre }}</button></li>
                        </template>

                        <li class="menu-title text-2xl">Non-Fiction</li>
                        <template v-for="genre in genres['Non-Fiction']" :key="genre.id">
                            <li><button @click.prevent="selectGenre(genre.genre)">{{ genre.genre }}</button></li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>

        <!--  Center Bar -->
        <div class="grow place-items-center w-full space-y-4">
            <div class="w-full">
                <label class="input input-ghost">
                    <v-icon name="bi-search" />
                    <input v-model="search" type="search" class="grow" placeholder="Search" />
                </label>
            </div>

            <ul class="list bg-base-200 rounded-box w-full">
                <li v-for="book in books.data" :key="book.id" class="list-row">
                    <div>
                        <img class="size-14 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"
                            :alt="`Cover of ${book.title}`" />
                    </div>
                    <div>
                        <div>
                            <span class="uppercase">{{ book.title }}</span>
                            <span class="normal-case"> ({{ book.format }})</span>
                        </div>
                        <div class="text-xs font-semibold opacity-60 mb-1">{{book.authors.map(author =>
                            author.name).join(', ')
                        }}</div>
                        <div class="flex flex-wrap gap-2">
                            <button v-for="genre in book.genres" :key="genre.id"
                                class="badge badge-soft badge-xs sm:badge-sm cursor-pointer"
                                @click.prevent="selectGenre(genre.genre)">
                                {{ genre.genre }}
                            </button>
                        </div>
                    </div>
                    <div class="align-items-end">
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                </li>
            </ul>

            <Pagination :links="books.links" />

        </div>

        <!--  Right Bar -->
        <div class="grow place-items-center hidden lg:block">
            <div class="w-48">
                <h1 class="font-medium text-md capitalize">Book Manager For Book Collectors And Enthusiasts</h1>
                <p class="text-xs mt-2">Organize and track your book collection</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { debounce } from 'lodash';
import Pagination from '../../Shared/Pagination.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

let props = defineProps({
    genres: Object,
    books: Object,
    filters: Object,
})

let search = ref(props.filters.search);

function selectGenre(genreName) {
    search.value = genreName;
}

watch(search, debounce(function (value) {
    router.get('/books', { search: value }, {
        preserveState: true,
        replace: true
    });
}, 500));
</script>
