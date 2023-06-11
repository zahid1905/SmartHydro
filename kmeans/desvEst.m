function des=desvEst(lista,prom)
  s=0;
  for i=1:length(lista)
    s=s+(lista(i)-prom).^2; % Sumamos los elementos que pertenecen
  end
  des=sqrt(s/length(lista));
end
