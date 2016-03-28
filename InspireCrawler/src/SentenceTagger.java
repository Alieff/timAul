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

public class SentenceTagger {

    String tempFilename = "lele.txt";
    PrintWriter out;
    PrintWriter toFile;
    // Writer w ;
    Properties props;
    StanfordCoreNLP pipeline;
    final String serializedClassifier = "model/english.all.3class.distsim.crf.ser.gz";
    AbstractSequenceClassifier classifier;

    public SentenceTagger(){

        try{
            // FileOutputStream is = new FileOutputStream(statText);
            // OutputStreamWriter osw = new OutputStreamWriter(is);
            // this.w = new BufferedWriter(osw);


            //FOR NER
            classifier = CRFClassifier.getClassifierNoExceptions(serializedClassifier);
        }catch(Exception e){
            System.out.println("IO Error");
        }
        this.props =  new Properties();
        loadModels();
        this.pipeline = new StanfordCoreNLP(props);
    }


    public String identify(String sentences){

        String result = "";
        Annotation annotation = new Annotation(sentences);
        // run all the selected Annotators on this text
        pipeline.annotate(annotation);
        try{
            pipeline.jsonPrint(annotation,toFile);
            JSONParser parser = new JSONParser();

            Object obj = parser.parse(new FileReader(tempFilename));

            JSONObject jsonObject = (JSONObject) obj;

            JSONArray companyList = (JSONArray) jsonObject.get("sentences");
            Iterator<JSONObject> iterator = companyList.iterator();
            while (iterator.hasNext()) {
                String parseTree = (String) iterator.next().get("parse");
                // System.out.println(parseTree);
                String np = extractTree(parseTree,"NP");
                String vp = extractTree(parseTree,"VP");
                String nn = extractTree(parseTree,"NN");
                // w.write(np);
                //      	w.write(vp);
                //      	w.write(nn);
                //      	w.write("\n");
                result+= np+vp+nn+"\n";
            }
            // w.close();
        }catch(Exception e){
            System.out.println("Error");
            System.out.println(e.getMessage());
        }
        return result;
    }

    /**
     * Method ini akan mengembalikan tag PEOPLE untuk kata yang berupa nama orang
     * @param sentences beberapa kalimat yang ingin ditag
     * @return kata sudah tertag
     */
    public String addNer(String sentences){
        List<List<CoreLabel>> out = classifier.classify(sentences);
        String wordReturned = "";
        final  Pattern FILTERS = Pattern.compile("(}|\\\\|n't|'m|VP|NP|S|.)");

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


    private void loadModels(){

        // Add in sentiment

        this.props.setProperty("ner.useSUTime","0");
        this.props.put("annotators", "tokenize, ssplit, pos, lemma, parse");
        this.props.put("pos.model", "model/english-left3words-distsim.tagger");
    }


    private static String extractTree(String pool, String head){
        int firstIndex = pool.indexOf("("+head);
        int paranthesesCount = 0;
        int lastIndex = 0;
        String result = "";
        int recordState = 0;
        // kalau ketemu "(" state jadi 1, record off
        // kalau ketemu " " state jadi 3, ready to record
        // kalau ketemu ")" jadi 1, record off
        // dari 3 kalau ketemu selain "(" atau ")" jadi 2, record on
        if(firstIndex<0){
            return head+" not found ";
        }
        for(int ii = firstIndex ; ii<pool.length() ; ii++){
            char currentChar = pool.charAt(ii);


            if(currentChar=='(' ){
                paranthesesCount++;
                recordState = 1;
            }else if(currentChar==' '){
                if(result.length()>0 && result.charAt(result.length()-1) != ' ')
                    result += " ";
                recordState = 3;
            }else if(currentChar==')'){
                paranthesesCount--;
                recordState = 1;
            }else if(recordState != 1){
                recordState = 2;
            }
            if(recordState==2){
                result+=currentChar;
            }
            if(paranthesesCount==0){
                lastIndex=ii;
                break;
            }
        }
        return "{"+result+"}\\"+head;
    }
}