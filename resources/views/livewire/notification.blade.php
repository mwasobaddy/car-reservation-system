<div 
    x-data="{
        messages: @entangle('messages').live,
        remove(id) {
            @this.call('removeMessage', id);
        },
        init() {
            $watch('messages', (messages) => {
                Object.keys(messages).forEach(id => {
                    if (messages[id].timeout) {
                        setTimeout(() => {
                            this.remove(id);
                        }, messages[id].timeout);
                    }
                });
            });
        }
    }"
    class="fixed bottom-4 right-4 z-50 space-y-4"
    role="status"
    aria-live="polite"
>
    <template x-for="(message, id) in messages" :key="id">
        <div
            x-show="message"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @mouseenter="clearTimeout(timeout)"
            @mouseleave="startTimeout()"
            :class="{
                'bg-green-50 border-green-400': message.type === 'success',
                'bg-red-50 border-red-400': message.type === 'error',
                'bg-yellow-50 border-yellow-400': message.type === 'warning',
                'bg-blue-50 border-blue-400': message.type === 'info'
            }"
            class="w-96 rounded-lg border-l-4 p-4 shadow-lg flex items-start"
        >
            <!-- Icon -->
            <div class="flex-shrink-0">
                <svg x-show="message.type === 'success'" class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <svg x-show="message.type === 'error'" class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <!-- Add more icons for 'warning' and 'info' if needed -->
            </div>
            
            <!-- Message -->
            <div class="ml-3 flex-1">
                <p 
                    x-text="message.message" 
                    class="text-sm font-medium"
                    :class="{
                        'text-green-800': message.type === 'success',
                        'text-red-800': message.type === 'error',
                        'text-yellow-800': message.type === 'warning',
                        'text-blue-800': message.type === 'info'
                    }"
                ></p>
            </div>
            
            <!-- Close Button -->
            <div class="ml-auto pl-3">
                <button 
                    @click="remove(message.id)"
                    class="inline-flex rounded-md p-1.5 focus:outline-none"
                    :class="{
                        'text-green-500 hover:bg-green-100': message.type === 'success',
                        'text-red-500 hover:bg-red-100': message.type === 'error',
                        'text-yellow-500 hover:bg-yellow-100': message.type === 'warning',
                        'text-blue-500 hover:bg-blue-100': message.type === 'info'
                    }"
                >
                    <span class="sr-only">Dismiss</span>
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>
    </template>
</div>