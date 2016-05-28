package junittest;

import main.SentenceTagger;
import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.assertEquals;

/**
 * Created by haryoaw on 16/05/16.
 */
public class SentenceTaggerTest {
    private SentenceTagger sentenceTagger;
    @Before
    public void initialize() {
        sentenceTagger = new SentenceTagger();
    }

    @Test
    public void addNerTC1() throws Exception {
        //IF there is a person thereee
        String sentence = "I am a person named Obama.";

        String expected = "I am a person named Obama/PERSON.\n";

        assertEquals(expected,sentenceTagger.addNer(sentence));
    }

    @Test
    public void addNerTC2() throws Exception {
        //IF there is a person thereee
        String sentence = "He is handsome.";

        String expected = "He is handsome.\n";

        assertEquals(expected,sentenceTagger.addNer(sentence));
    }
}
