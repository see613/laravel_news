<script setup lang="ts">
import moment from 'moment';

defineProps<{
    comment: Comment;
}>();
</script>

<template>
    <div class="comment">
        <hr>
        <p class="text-md pt-4">
            {{ comment.username }}
        </p>
        <p class="text-xs text-muted-foreground">
            {{ moment(comment.created_at).format('MM-DD-YYYY hh:mm') }}
        </p>
        <div v-html="comment.body"
             class="pt-4"
             style="white-space: pre-line"></div>
    </div>
</template>
