function c=promedio(lista)
  s=0;
  for i=1:length(lista)
     s=s+lista(i); % Sumamos los elementos que pertenecen
  end
  % Promedio
  c=s/length(lista);
end
