<script setup lang="ts">
import moment from 'moment';

defineProps<{
    post: Post;
}>();
</script>

<template>
    <div class="news-post mb-10">
        <h2 class="text-xl font-medium mb-4">
            {{ post.headline }}
        </h2>

        <p class="text-xs text-muted-foreground mb-4">
            {{ moment(post.created_at).format('MM-DD-YYYY hh:mm') }}
        </p>

        <div v-html="post.body"
             class="body"></div>
    </div>
</template>
