#!/ usr / bin / perl -w
# use Data::Dumper;
# print Dumper scalar @ARGV ;

# il faut 3 parametres
# si il y a plus ou moin de 3 argv tu print ca
if (( scalar @ARGV ) != 3){
    print "program x y density \n";
    exit ;
}

my $x = $ARGV [0];
my $y = $ARGV [1];
my $density = $ARGV [2];
my $i = 0;
my $j = 0;

# tu affiche y, je sais pas pourquoi c'est inutile
print $y . "\n";

while ( $i < $y ){

    $j = 0;

    while ( $j < $x ){   

        if (int(rand ($y)*2) < $density){
            print "o";
        }

        else{
        print ".";
        }
        
        $j ++;
    }
    
    print "\n";

    $i ++;
}