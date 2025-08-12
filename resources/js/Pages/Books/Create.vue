<template>
    <Modal v-slot="{ close }">
        <h1 class="font-bold">Add a Book</h1>

        <form @submit.prevent="submit(close)">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Title</legend>
                <input type="text" class="input validator w-full" required placeholder="Type here" minlength="3"
                    maxlength="46" v-model="form.title" />
                <p class="text-red-400" v-if="form.errors.title">{{ form.errors.title }}</p>

                <div>
                    <div class="flex gap-1 items-center mb-2">
                        <legend class="fieldset-legend">Author</legend>
                    </div>
                    <div v-for="(author, index) in form.authors" :key="index" class="mb-2 flex items-center">
                        <input type="text" class="input validator flex-grow" required placeholder="Enter author name"
                            list="authors" minlength="3" maxlength="46" v-model="form.authors[index]" />

                        <button type="button" class="ml-2 btn btn-circle btn-xs btn-outline btn-error"
                            @click="removeAuthorInput(index)" :disabled="form.authors.length === 1">
                            <span class="font-black">&times;</span>
                        </button>
                    </div>
                    <datalist id="authors">
                        <option v-for="author in authors" :key="author.id" :value="author.name" />
                    </datalist>
                    <button type="button" class="btn btn-sm btn-outline btn-primary" @click="addAuthorInput">
                        <span class="text-lg font-bold">+</span>
                        Add Authors
                    </button>
                    <p class="text-red-400" v-if="form.errors.authors">{{ form.errors.authors }}</p>
                </div>

                <legend class="fieldset-legend">Page Number</legend>
                <input type="number" class="input validator w-full" required min="1" v-model="form.num_pages" />
                <p class="text-red-400" v-if="form.errors.num_pages">{{ form.errors.num_pages }}</p>

                <legend class="fieldset-legend">Formats</legend>
                <select class="select validator w-full" required v-model="form.format">
                    <option disabled selected value="">Pick a format</option>
                    <option>Paperback</option>
                    <option>Hardcover</option>
                    <option>Other</option>
                </select>
                <p class="text-red-400" v-if="form.errors.format">{{ form.errors.format }}</p>

                <legend class="fieldset-legend">Price</legend>
                <label class="input validator w-full">
                    <span class="label">Php (₱)</span>
                    <input type="number" class="grow" required min="0" v-model="form.price" />
                </label>
                <p class="text-red-400" v-if="form.errors.price">{{ form.errors.price }}</p>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Category</legend>
                    <div class="filter">
                        <input class="btn filter-reset" type="radio" name="category" value="all"
                            v-model="selectedCategory" aria-label="All" />
                        <input class="btn" type="radio" name="category" value="fiction" v-model="selectedCategory"
                            aria-label="Fiction" />
                        <input class="btn" type="radio" name="category" value="non-fiction" v-model="selectedCategory"
                            aria-label="Non-Fiction" />
                    </div>

                    <div v-if="selectedCategory === 'fiction'">
                        <fieldset class="fieldset bg-base-100 border-base-300 rounded-box border p-4">
                            <legend class="fieldset-legend">Genre Fiction</legend>
                            <div class="grid grid-cols-3 gap-2">
                                <label v-for="genre in genres['Fiction']" :key="genre.id" class="label cursor-pointer">
                                    <input type="checkbox" class="checkbox checkbox-sm" :value="genre.id"
                                        v-model="form.genre_ids" />
                                    {{ genre.genre }}
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <div v-if="selectedCategory === 'non-fiction'">
                        <fieldset class="fieldset bg-base-100 border-base-300 rounded-box border p-4">
                            <legend class="fieldset-legend">Genre Fiction</legend>
                            <div class="grid grid-cols-3 gap-2">
                                <label v-for="genre in genres['Non-Fiction']" :key="genre.id"
                                    class="label cursor-pointer">
                                    <input type="checkbox" class="checkbox checkbox-sm" :value="genre.id"
                                        v-model="form.genre_ids" />
                                    {{ genre.genre }}
                                </label>
                            </div>
                        </fieldset>
                    </div>
                </fieldset>
                <p class="text-red-400" v-if="form.errors.genre_ids">{{ form.errors.genre_ids }}</p>

                <legend class="fieldset-legend">Date Bought</legend>
                <input type="date" class="input validator w-full" required v-model="form.date_bought" />
                <p class="text-red-400" v-if="form.errors.date_bought">{{ form.errors.date_bought }}</p>

                <legend class="fieldset-legend">Upload Book Cover (Optional)</legend>
                <input type="file" class="file-input w-full" />
            </fieldset>

            <div class="flex justify-end gap-2">
                <button type="button" @click="close" class="mt-10 btn btn-outline btn-error">Cancel</button>
                <button type="submit" :disabled="form.processing" class="mt-10 btn btn-primary">Submit</button>
            </div>

        </form>
    </Modal>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

let props = defineProps({
    authors: Array,
    genres: Object,
});

const selectedCategory = ref('all');

const form = useForm({
    title: null,
    authors: [''],
    num_pages: null,
    price: null,
    genre_ids: [],
    date_bought: '',
    format: '',
});

function addAuthorInput() {
    form.authors.push('');
}

function removeAuthorInput(index) {
    if (form.authors.length > 1) {
        form.authors.splice(index, 1);
    }
}

watch(selectedCategory, (newCategory) => {
    if (newCategory === 'all') {
        form.genre_ids = [];
    }
});

function submit(close) {
    form.post('/books', {
        onSuccess() {
            close();
        },
    })
}

</script>
