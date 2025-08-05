<template>
    <div class="flex justify-between space-x-4 space-y-4">
        <div class="grow place-items-center">
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

        <div class="grow place-items-center w-full">
            <ul class="list bg-base-200 rounded-box w-full">
                <li class="list-row">
                    <div>
                        <img class="size-14 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp" />
                    </div>
                    <div>
                        <div class="uppercase">The Brothers Karamazov</div>
                        <div class="text-xs font-semibold opacity-60 mb-1">Fyodor Dostoevsky</div>
                    </div>
                    <div class="align-items-end">
                        <a href="" class="btn btn-primary">View</a>
                    </div>
                </li>

                <li class="list-row">
                    <div>
                        <img class="size-14 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp" />
                    </div>
                    <div>
                        <div class="uppercase">The Brothers Karamazov</div>
                        <div class="text-xs font-semibold opacity-60 mb-1">Fyodor Dostoevsky</div>
                    </div>
                    <div class="align-items-end">
                        <a href="" class="btn btn-primary">View</a>
                    </div>
                </li>

                <li class="list-row">
                    <div>
                        <img class="size-14 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp" />
                    </div>
                    <div>
                        <div class="uppercase">The Brothers Karamazov</div>
                        <div class="text-xs font-semibold opacity-60 mb-1">Fyodor Dostoevsky</div>
                    </div>
                    <div class="align-items-end">
                        <a href="" class="btn btn-primary">View</a>
                    </div>
                </li>


            </ul>
        </div>

        <div class="grow place-items-center hidden lg:block">
            <div class="w-48">
                <h1 class="font-medium text-md capitalize">Book Manager For Book Collectors And Enthusiasts</h1>
                <p class="text-xs mt-2">Organize and track your book collection</p>
            </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    genres: Object,
})

</script>
