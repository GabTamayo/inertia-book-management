<template>
    <Modal>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full md:w-1/3">
                <img class="w-80 h-120 rounded-r-lg object-fill"
                    src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1461354651i/15839976.jpg"
                    alt="">
            </div>

            <div class="w-auto md:w-2/3 m-4 space-y-4">
                <div>
                    <h1 class="text-2xl font-semibold">Harry Potter and the Deathly Hollows</h1>
                    <p class="mt-2 text-sm">Nick Gur</p>
                </div>

                <div role="tablist" class="tabs tabs-border">
                    <a role="tab" class="tab">Tab 1</a>
                    <a role="tab" class="tab tab-active">Tab 2</a>
                    <a role="tab" class="tab">Tab 3</a>
                </div>

                <div class="mb-10">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam tenetur doloremque dignissimos,
                        rem vitae commodi repudiandae. Quibusdam delectus cum voluptate recusandae, quos voluptates
                        temporibus excepturi nulla quasi atque facere minima.</p>
                </div>

                <div class="border-t p-2">
                    <p class="text-sm">Price bought</p>
                    <h1 class="text-4xl font-semibold">₱100</h1>
                    <p class="mt-2 text-xs text-end">August 1, 2025</p>
                </div>

                <div class="space-x-4">
                    <button class="btn btn-primary btn-wide">Edit</button>
                    <button class="btn btn-error btn-wide">Delete</button>
                </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>

</script>
