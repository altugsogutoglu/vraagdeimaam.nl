<div>
    @if(session()->has('error'))
    <div class="mb-6 sm:mb-8 bg-red-100 border-2 border-red-300 rounded-xl p-4 sm:p-6">
        <div class="flex items-start space-x-3">
            <div class="flex-shrink-0 mt-1">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-red-800 mb-1">Fout</h4>
                <p class="text-sm text-red-700">{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif

    <form wire:submit="submit" class="space-y-4 sm:space-y-6">
        <div>
            <label for="email" class="block text-sm font-medium text-[#0F1419] mb-2 sm:mb-3">
                E-mail *
            </label>
            <input type="email" id="email" wire:model="email"
                class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300 @error('email') border-red-500 @enderror"
                placeholder="uw.email@voorbeeld.nl"
                :disabled="$submitted">
            @error('email')
            <p class="mt-2 text-xs sm:text-sm text-red-600 flex items-center space-x-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ $message }}</span>
            </p>
            @enderror
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-[#0F1419] mb-2 sm:mb-3">
                Naam (optioneel)
            </label>
            <input type="text" id="name" wire:model="name"
                class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300"
                placeholder="Optioneel"
                :disabled="$submitted">
        </div>

        <div>
            <label for="question" class="block text-sm font-medium text-[#0F1419] mb-2 sm:mb-3 font-arabic">
                Jouw Vraag *
            </label>
            <textarea id="question" wire:model="question" rows="6"
                class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border-2 border-[#D4AF37] rounded-xl focus:ring-3 focus:ring-[#D4AF37]/20 focus:border-[#8B1538] bg-[#FDF7E7] transition-all duration-300 @error('question') border-red-500 @enderror"
                placeholder="Stel hier je islamitische vraag..."
                :disabled="$submitted"></textarea>
            @error('question')
            <p class="mt-2 text-xs sm:text-sm text-red-600 flex items-center space-x-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 000 2v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ $message }}</span>
            </p>
            @enderror
        </div>

        <!-- Privacy Notice -->
        <div class="bg-[#D4AF37]/10 border-2 border-[#D4AF37]/30 rounded-xl p-4 sm:p-6">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0 mt-1">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6 text-[#8B1538]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs sm:text-sm font-semibold text-[#8B1538] mb-1 sm:mb-2">Privacy Gegarandeerd</h4>
                    <p class="text-xs sm:text-sm text-[#1B4B4C] leading-relaxed">
                        Je persoonlijke gegevens worden volledig anoniem gehouden en nooit gedeeld.
                    </p>
                </div>
            </div>
        </div>

        <button type="submit"
            class="btn-ottoman w-full flex items-center justify-center space-x-2 transition-all duration-300"
            :class="{ 'bg-green-600 hover:bg-green-600': $submitted }"
            :disabled="$submitted"
            wire:loading.attr="disabled">

            <!-- Spinner (only visible during loading) -->
            <svg wire:loading wire:target="submit" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>

            <!-- Icon (hidden during loading) -->
            @if($submitted)
                <svg wire:loading.remove wire:target="submit" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            @else
                <svg wire:loading.remove wire:target="submit" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            @endif

            <!-- Text -->
            <span wire:loading wire:target="submit">Verzenden...</span>
            <span wire:loading.remove wire:target="submit">
                @if($submitted)
                    Vraag Verzonden
                @else
                    Vraag Indienen
                @endif
            </span>
        </button>
    </form>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('question-submitted', () => {
                setTimeout(() => {
                    location.reload();
                }, 3000);
            });
        });
    </script>
</div>
