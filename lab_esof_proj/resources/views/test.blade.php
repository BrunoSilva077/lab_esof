@extends('layouts.app')

@section('content')
<Style>

html, body {
    height: 100vh;
    margin: 0;
    overflow-x: hidden;
  }
footer{
    /*background-color: #2C2929;*/
    width: 100%;
    height: 250px;
    left: 0;
    bottom: 0;
    position: fixed;
}
.container {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 16px; /* Espaçamento entre colunas, ajuste conforme necessário */
    padding-left: 70px; /* Adiciona 70px à esquerda */
    padding-right: 70px; /* Adiciona 70px à direita */
    height: 100%;
  }

  .column {
    position: relative;
    padding: 16px;
    border: 1px solid #ddd; /* Adicione uma borda para visualização */
    text-align: center;
    height: 100%;
  }
  h2{
    position: absolute;
    left: 0;
    margin: 0; /* Remove margens padrão do h2*/
    top: 80%; /* Posiciona abaixo do h2, ajuste conforme necessário */
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    height: 80%;
  }
  h3{
    position: absolute;
    left: 0;
    margin: 0; /* Remove margens padrão do h3 */
    top: 85%; /*Posiciona abaixo do h2, ajuste conforme necessário */
    overflow: hidden;
    white-space: nowrap;
  }

</Style>
<div class="container">
  <div class="column">
    <h2>Subscribe newletter</h2>
        <h3>Subscribe to our newsletter for exclusive information on our Events, Promotions and Offers.</h3>
  </div>
  <div class="column">2</div>
  <div class="column">3</div>
  <div class="column">4</div>
  <div class="column">5</div>
  <div class="column">6</div>
  <div class="column">7</div>
  <div class="column">8</div>
  <div class="column">9</div>
  <div class="column">10</div>
  <div class="column">11</div>
  <div class="column">12</div>
</div>
@endsection