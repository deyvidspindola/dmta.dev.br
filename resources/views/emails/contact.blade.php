<x-mail::message>
# Novo contato pelo site

**Nome:** {{ $data['name'] }}  
**E-mail:** {{ $data['email'] }}  
**Telefone:** {{ $data['phone'] ?: '—' }}  
**Tipo de projeto:** {{ $data['project_type'] }}

**Mensagem:**

{{ $data['message'] }}

—
Site DMTA
</x-mail::message>
