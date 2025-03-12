<script setup lang="ts">
    import InputError from '@/components/InputError.vue';
    import { Button } from '@/components/ui/button';
    import { Input } from '@/components/ui/input';
    import { Textarea } from '@/components/ui/textarea';
    import NewsLayout from '@/layouts/NewsLayout.vue';
    import NewsPostView from '@/components/NewsPostView.vue';
    import Comment from '@/components/Comment.vue';
    import {Link, useForm} from '@inertiajs/vue3';
    import { LoaderCircle } from 'lucide-vue-next';
    import {Post} from "@/types";


    const props = defineProps<{
        status?: string;
        post: Post;
    }>();

    const form = useForm({
        post_id: props.post.id,
        username: '',
        body: '',
    });

    const submit = () => {
        form.post(route('comment.store'), {
            onFinish: () => {
                form.reset('body');
            },
        });
    };
</script>

<template>
    <NewsLayout title="Новость" description="Читайте последние новости из мира Laravel">
        <Link href="/news" class="">&larr; Все новости</Link>

        <NewsPostView :post="post"></NewsPostView>

        <div>
            <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="flex flex-col gap-6">
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <h3 class="text-md font-medium text-center">
                            Комментарии
                        </h3>
                    </div>

                    <div class="grid gap-2">
                        <Input
                            id="username"
                            type="text"
                            required
                            autofocus
                            :tabindex="1"
                            v-model="form.username"
                            placeholder="Ваше имя"
                        />
                        <InputError :message="form.errors.username" />
                    </div>

                    <div class="grid gap-2">
                    <Textarea
                        id="body"
                        type="textarea"
                        required
                        :tabindex="2"
                        v-model="form.body"
                        placeholder="Комментарий..."
                    />
                        <InputError :message="form.errors.body" />
                    </div>

                    <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Отправить
                    </Button>
                </div>
            </form>
        </div>

        <div v-for="comment in post.comments" :key="comment.id">
            <Comment :comment="comment"></Comment>
        </div>
    </NewsLayout>
</template>
