<div>
   <h2>Show Tweets</h2>

   <p>{{ $message }}</p>

   {{-- Formulário para criar tweet --}}
   <form method="POST" wire:submit.prevent="createTweet">
       <input type="text" name="message" id="message-input" wire:model="message" />
       <button type="submit">Criar tweet</button>
   </form>

   <hr>

   {{-- Listagem de tweets --}}
   <div>
       @foreach ($tweets as $tweet)
           <div class="tweet border-b border-gray-200 py-2">
               <h3 class="font-bold">{{ $tweet->user->name }}</h3>
               <p>{{ $tweet->content }}</p>
               <small class="text-gray-500">
                   Posted at: {{ $tweet->created_at ? $tweet->created_at->diffForHumans() : 'Data indisponível' }}
               </small>
           </div>
       @endforeach
   </div>

   {{-- Paginação --}}
   <div class="mt-4">
       {{ $tweets->links() }}
   </div>
</div>
