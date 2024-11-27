<div x-data>
    <template x-for="message in messages" :key="message.id">
        <div
            x-init="setTimeout(() => $wire.removeMessage(message.id), message.timeout || 5000)"
            :class="{
                'bg-green-50 border-green-400': message.type === 'success',
                'bg-red-50 border-red-400': message.type === 'error',
                'bg-yellow-50 border-yellow-400': message.type === 'warning',
                'bg-blue-50 border-blue-400': message.type === 'info'
            }"
            class="fixed bottom-4 right-4 rounded-lg border-l-4 p-4 shadow-sm"
        >
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <!-- Success Icon -->
                    <svg x-show="message.type === 'success'" class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <!-- Error Icon -->
                    <svg x-show="message.type === 'error'" class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                    <div class="ml-3">
                        <p x-text="message.message" class="text-sm font-medium"
                            :class="{
                                'text-green-800': message.type === 'success',
                                'text-red-800': message.type === 'error',
                                'text-yellow-800': message.type === 'warning',
                                'text-blue-800': message.type === 'info'
                            }"
                        ></p>
                    </div>
                    <div class="ml-auto pl-3">
                        <button 
                            @click="$wire.removeMessage(message.id)"
                            class="inline-flex rounded-md p-1.5"
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
            </div>
        </div>
    </template>
    

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.hook('element.updated', (el, component) => {
            Alpine.initTree(el)
        })
    })
</script>
</div>