package main;

import java.io.FileReader;
import java.io.IOException;

import java.util.List;
import java.util.Properties;
import java.util.regex.Pattern;

import edu.stanford.nlp.ie.AbstractSequenceClassifier;
import edu.stanford.nlp.ie.crf.CRFClassifier;
import edu.stanford.nlp.ling.CoreAnnotations;
import edu.stanford.nlp.ling.CoreLabel;
import org.json.simple.parser.ParseException;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import edu.stanford.nlp.pipeline.*;

/**
 * This class is used to parse the text and tag NER
 * @author haryoaw and alief
 */
public class SentenceTagger {

    private Properties props;
    private StanfordCoreNLP pipeline;
    private AbstractSequenceClassifier classifier;

    /**
     * model that is used for NER
     */
    private static final String serializedClassifier = "model/english.all.3class.distsim.crf.ser.gz";
    /**
     * Temporary file to save parsed properties
     */
    private static final String TEMPFILENAME = "json.txt";

    /**
     *  Set several model and properties for parsing the data and do NER
     */
    public SentenceTagger(){
        classifier = CRFClassifier.getClassifierNoExceptions(serializedClassifier);
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
        final Pattern FILTERS = Pattern.compile("(}|\\\\|n't|'re|’re|n’t|’m|’s|'s|’ve|’ll|'ll|'ve|'m|VP|NP|S|\\.|,)");

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

    /**
     * Parse the sentences
     * @param sentences the sentence
     * @return parsed
     */
    public String partialIdentify(String sentences){

        // save sentences to file
        String[] partOfSentences = sentences.split("\n");
        String result = "";

        // loop
        for(int ii = 0 ; ii < partOfSentences.length ; ii++){
            sentences = partOfSentences[ii];
            String temp = identify(sentences);
            result += temp;

        }
        // save result
        return result;
    }

    /**
     * Parse the phrase
     * @param sentences the phrase
     * @return phrase that is known by its label
     */
    private String identify(String sentences){

        String result = "";
        Annotation annotation = new Annotation(sentences);

        // run all the selected Annotators on this text
        pipeline.annotate(annotation);
        try{

            JSONParser parser = new JSONParser();
            Object obj = parser.parse(new FileReader(TEMPFILENAME));
            JSONObject jsonObject = (JSONObject) obj;
            JSONArray companyList = (JSONArray) jsonObject.get("sentences");

            for (JSONObject aCompanyList : (Iterable<JSONObject>) companyList) {
                String parseTree = (String) aCompanyList.get("parse");

                TreeNode node = new TreeNode();
                node.construct(parseTree);
                result += node.getChildrenOfLv2();
                result += "\r";
            }
            result += "\n";

        }catch(IOException e){
            System.out.println("IO Error");
            e.printStackTrace();
        }catch(ParseException e){
            System.out.println("Error on parse");
            e.printStackTrace();
        }

        return result;
    }

}
