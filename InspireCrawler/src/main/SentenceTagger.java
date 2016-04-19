package main;

import java.io.*;
import java.util.*;
import java.util.regex.Pattern;

import edu.stanford.nlp.ie.AbstractSequenceClassifier;
import edu.stanford.nlp.ie.crf.CRFClassifier;
import edu.stanford.nlp.ling.CoreAnnotations;
import edu.stanford.nlp.ling.CoreLabel;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import edu.stanford.nlp.pipeline.*;
//TODO: REFACTOR INI DLL
/**
 * This class is used to parse the text and tag NER
 * @author haryoaw and alief
 */
public class SentenceTagger {

    private Properties props;
    private StanfordCoreNLP pipeline;
    private final String serializedClassifier = "model/english.all.3class.distsim.crf.ser.gz";
    private AbstractSequenceClassifier classifier;
    String tempFilename = "json.txt";
    /**
     *
     */
    public SentenceTagger(){

        try{
            //FOR NER
            classifier = CRFClassifier.getClassifierNoExceptions(serializedClassifier);
        }catch(Exception e){
            System.out.println("IO Error");
        }

        this.props =  new Properties();
        loadModels();
        this.pipeline = new StanfordCoreNLP(props);
    }


    /**
     * Method ini akan mengembalikan tag PEOPLE untuk kata yang berupa nama orang
     * @param sentences beberapa kalimat yang ingin ditag
     * @return kata sudah tertag
     */
    public String addNer(String sentences){
        List<List<CoreLabel>> out = classifier.classify(sentences);
        String wordReturned = "";
        final  Pattern FILTERS = Pattern.compile("(}|\\\\|n't|'re|’re|n’t|’m|’s|'s|’ve|’ll|'ll|'ve|'m|VP|NP|S|\\.|,)");

        for (List<CoreLabel> sentence : out){
            for(int i = 0; i < sentence.size(); i++) {
                CoreLabel word = sentence.get(i);

                String tagNer = word.get(CoreAnnotations.AnswerAnnotation.class);
                if (tagNer.equalsIgnoreCase("PERSON"))
                    wordReturned += word.originalText() + '/' + tagNer; //Hanya untuk /PERSON
                else
                    wordReturned += word.originalText();

                //Klo berikutnya bukan {, \\ n't, 'm pake spasi
                if(i < sentence.size()-1) {
                    String nextWord = sentence.get(i + 1).originalText();
                    if (!FILTERS.matcher(nextWord).matches() && !word.originalText().equals("{")) {
                        wordReturned += " ";
                    }
                }
            }
            wordReturned += "\n";
        }
        return wordReturned;
    }


    /**
     * Load semua model yang diperlukan
     */
    private void loadModels(){
        this.props.setProperty("ner.useSUTime","0");
        this.props.put("annotators", "tokenize, ssplit, pos, lemma, parse");
        this.props.put("pos.model", "model/english-left3words-distsim.tagger");
    }

    public String partialIdentify(String sentences){
        // save sentences to file
        String[] partOfSentences = sentences.split("\n");
        String result = "";
        // loop
        for(int ii = 0 ; ii < partOfSentences.length ; ii++){
            sentences = partOfSentences[ii];
            String temp = identify(sentences);
//    		if(temp.split(" ").length>5){
            result += temp;
//    		}
        }
        System.out.println(result);
        // save result
        return result;
    }

    private String identify(String sentences){

        String result = "";
        Annotation annotation = new Annotation(sentences);
        // run all the selected Annotators on this text
        pipeline.annotate(annotation);
        try{

            JSONParser parser = new JSONParser();

            Object obj = parser.parse(new FileReader(tempFilename));

            JSONObject jsonObject = (JSONObject) obj;

            JSONArray companyList = (JSONArray) jsonObject.get("sentences");
            Iterator<JSONObject> iterator = companyList.iterator();
            while (iterator.hasNext()) {
                String parseTree = (String) iterator.next().get("parse");
                // System.out.println(parseTree);
                TreeNode node = new TreeNode();
                node.construct(parseTree);
                result += node.getChildrenOfLv2();
                result += "\r";
            }
            result += "\n";
            // w.close();
        }catch(Exception e){
            System.out.println("Error");
            e.printStackTrace();
        }

        return result;
    }

}
