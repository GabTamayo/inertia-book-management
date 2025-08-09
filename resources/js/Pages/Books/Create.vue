<template>
    <div>
        <h1 class="font-bold">Add a Book</h1>

        <form>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Book details</legend>

                <legend class="fieldset-legend">Title</legend>
                <input type="text" class="input" required placeholder="Type here" minlength="3" maxlength="46" />

                <legend class="fieldset-legend">Author</legend>
                <input type="text" class="input" required placeholder="Name" minlength="3" maxlength="46" />

                <legend class="fieldset-legend">Page Number</legend>
                <input type="number" class="input" min="1" />
            </fieldset>

            <fieldset class="fieldset flex w-full flex-col">
                <legend class="fieldset-legend">Date Bought</legend>
                <input type="date" class="input" />

                <legend class="fieldset-legend">Price</legend>
                <label class="input">
                    <span class="label">Php (₱)</span>
                    <input type="number" class="grow" required max="10" />
                </label>
            </fieldset>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';


</script>
