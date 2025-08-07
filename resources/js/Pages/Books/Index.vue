<template>
    <div class="flex justify-between space-x-4 space-y-4">
        <!--  Left Bar -->

        <details class="dropdown md:hidden">
            <summary class="btn m-1">Genres</summary>
            <ul class="menu dropdown-content bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                <li class="menu-title text-xl">Fiction</li>
                <template v-for="genre in genres['Fiction']" :key="genre.id">
                    <li><a>{{ genre.genre }}</a></li>
                </template>

                <li class="menu-title text-xl">Non-Fiction</li>
                <template v-for="genre in genres['Non-Fiction']" :key="genre.id">
                    <li><a>{{ genre.genre }}</a></li>
                </template>
            </ul>
        </details>

        <div class="grow place-items-center hidden md:block">
            <ul class="menu bg-base-200 rounded-box w-48">
                <li class="menu-title text-2xl">Fiction</li>
                <template v-for="genre in genres['Fiction']" :key="genre.id">
                    <li><a>{{ genre.genre }}</a></li>
                </template>

                <li class="menu-title text-2xl">Non-Fiction</li>
                <template v-for="genre in genres['Non-Fiction']" :key="genre.id">
                    <li><a>{{ genre.genre }}</a></li>
                </template>
            </ul>
        </div>

        <!--  Center Bar -->
        <div class="grow place-items-center w-full">
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
                            <span v-for="genre in book.genres" :key="genre.id"
                                class="badge badge-soft badge-xs sm:badge-sm">
                                {{ genre.genre }}
                            </span>
                        </div>
                    </div>
                    <div class="align-items-end">
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                </li>
            </ul>

            <Pagination :links="books.links" class="my-4" />

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
import Pagination from '../../Shared/Pagination.vue';

defineProps({
    genres: Object,
    books: Object,
})

</script>
