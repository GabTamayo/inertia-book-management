<template>
    <div class="join">
        <component :is="link.url ? 'Link' : 'span'" v-for="link in links" :href="link.url" v-html="link.label"
            class="join-item btn btn-xs sm:btn-sm lg:btn-md" :class="[!link.url ? 'btn-disabled' : '',
            link.active ? 'btn-active' : ''
            ]" />
    </div>
</template>

<script>
export default {
    props: {
        links: Array,
    }
};
</script>
