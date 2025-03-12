<script setup lang="ts">
import {BreadcrumbItem} from "@/types";
import Pagination from '@/components/Pagination.vue';
import NewsLayout from '@/layouts/NewsLayout.vue';
import NewsPost from '@/components/NewsPost.vue';


const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'News',
        href: '/news',
    },
];

defineProps<{
    posts: Object;
}>();
</script>

<template>
    <NewsLayout title="Новость" description="Читайте последние новости из мира Laravel">
        <div v-for="post in posts.data" :key="post.id">
            <NewsPost :post="post"></NewsPost>
        </div>

        <Pagination class="mt-6" :links="posts.links" />
    </NewsLayout>
</template>
