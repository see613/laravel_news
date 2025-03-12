<script setup lang="ts">
import moment from 'moment';
import {Link} from '@inertiajs/vue3';

defineProps<{
    post: Post;
}>();
</script>

<template>
    <Link :href="`/news/${post.slug}`">
        <h2 class="font-medium mb-4">
            {{ post.headline }}
        </h2>

        <p class="text-xs text-muted-foreground mb-4">
            {{ moment(post.created_at).format('MM-DD-YYYY hh:mm') }}
        </p>
    </Link>
</template>
