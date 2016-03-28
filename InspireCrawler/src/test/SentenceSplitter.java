package test;

import main.SentenceTagger;

/**
 * Created by haryoaw on 28/03/16.
 */
public class SentenceSplitter {
    private SentenceTagger sentenceTagger;

    public SentenceSplitter(SentenceTagger sentenceTagger){
        this.sentenceTagger = sentenceTagger;
    }

    //BERHASILLL

    public String kunyuk(String diambil){
        String[] returned = diambil.split("\n");


        String hasilYangBeneranDiReturn = "";
        for(int i = 0; i < returned.length; i++){
            System.out.println(i + " = " + returned[i]);
            String hasilNer = sentenceTagger.addNer(returned[i]);
            hasilYangBeneranDiReturn += hasilNer;
            hasilYangBeneranDiReturn += "\n";
        }

        System.out.println(hasilYangBeneranDiReturn);
        return hasilYangBeneranDiReturn;
    }
}
